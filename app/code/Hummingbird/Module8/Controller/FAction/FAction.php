<?php 

namespace Hummingbird\Module8\Controller\FAction;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use \Magento\Framework\View\Result\PageFactory;

// Data Mapper classes
use Hummingbird\Module8\Model\Employee as EmployeeModel;
use Hummingbird\Module8\Model\ResourceModel\Employee as EmployeeResourceModel;


class FAction extends Action implements HttpGetActionInterface, HttpPostActionInterface{
    protected $_pageFactory;
	protected $model;
	protected $resourceModel;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		EmployeeModel $model,
		EmployeeResourceModel $resourceModel
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->model = $model;
		$this->resourceModel = $resourceModel;
		return parent::__construct($context);
	}

	public function execute()
	{   
		// get post variables.
		$postData = $this->getRequest()->getParams();
		
		// removes the form key field from the array before inserting into the model.
		array_pop($postData);
		$cleanPostData = $postData;

		$modelObj = $this->model->setData($cleanPostData);
		try{
			// saves the model to database using resourceModel
			$this->resourceModel->save($modelObj);
			$this->messageManager->addSuccessMessage(__('Record inserted into the database!'));
		}	catch(\Exception $e){
			$this->messageManager->addErrorMessage(__("Couldn't save to database"));
		}
		

		return $this->_pageFactory->create();
	}
}