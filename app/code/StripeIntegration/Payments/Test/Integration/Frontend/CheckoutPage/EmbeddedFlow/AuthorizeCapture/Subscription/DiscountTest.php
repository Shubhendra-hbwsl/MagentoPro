<?php

namespace StripeIntegration\Payments\Test\Integration\Frontend\CheckoutPage\EmbeddedFlow\AuthorizeCapture\Subscription;

class DiscountTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
        $this->tests = new \StripeIntegration\Payments\Test\Integration\Helper\Tests($this);
        $this->quote = new \StripeIntegration\Payments\Test\Integration\Helper\Quote();
    }

    /**
     * @magentoConfigFixture current_store payment/stripe_payments/payment_flow 0
     * @magentoDataFixture ../../../../app/code/StripeIntegration/Payments/Test/Integration/_files/Data/Discounts.php
     */
    public function testSubscriptionCart()
    {
        $this->quote->create()
            ->setCustomer('Guest')
            ->setCart("Subscription")
            ->setShippingAddress("California")
            ->setShippingMethod("FlatRate")
            ->setBillingAddress("California")
            ->setCouponCode("10_percent")
            ->setPaymentMethod("SuccessCard");

        $order = $this->quote->placeOrder();
        $ordersCount = $this->tests->getOrdersCount();
        $paymentIntent = $this->tests->confirmSubscription($order);

        // Refresh the order object
        $order = $this->tests->refreshOrder($order);
        $orderIncrementId = $order->getIncrementId();

        $this->tests->compare($order->debug(), [
            "state" => "processing",
            "status" => "processing",
            "base_subtotal" => 10,
            "base_discount_amount" => -1,
            "base_total_paid" => $order->getBaseGrandTotal(),
            "total_paid" => $order->getGrandTotal(),
        ]);

        // $paymentIntent = $this->tests->stripe()->paymentIntents->retrieve($paymentIntent->id);

        $grandTotal = round($order->getGrandTotal() * 100);

        $this->tests->compare($paymentIntent->charges->data[0], [
            "amount" => $grandTotal,
            "description" => "Subscription order #$orderIncrementId by Joyce Strother"
        ]);

        // Trigger webhook events for recurring order
        $this->tests->event()->trigger("charge.succeeded", $paymentIntent->charges->data[0]->id);
        $this->tests->event()->trigger("invoice.payment_succeeded", $paymentIntent->invoice, ['billing_reason' => 'subscription_update']);

        // Make sure a new order was created
        $newOrdersCount = $this->tests->getOrdersCount();
        $this->assertEquals($ordersCount + 1, $newOrdersCount);

        // Get the recurring order
        $recurringOrder = $this->tests->getLastOrder();

        // Order checks
        $this->tests->compare($recurringOrder->getData(), [
            "discount_amount" => $order->getDiscountAmount(),
            'grand_total' => $order->getGrandTotal() - 3.25, // 3.25 is initial fee + tax
            'shipping_amount' => $order->getShippingAmount(),
            'tax_amount' => $order->getTaxAmount() - 0.25, // 0.25 is the tax for the initial fee
        ]);
    }
}
