<?php

class ContactController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
    
    public function index()
	{
		$this->_view->set('title', 'Simple site Contact Form');
		return $this->_view->output();
	}
    
    public function leads()
	{
		$leads = $this->_model->getLeads();
        $this->_view->set('leads', $leads);
        $this->_view->set('title', 'List of Leads');
		return $this->_view->output();
	}

    public function save()
    {
        if (!isset($_POST['contactFormSubmit']))
		{
			header('Location: /contact/index');
		}
		
		$errors = array();
		$check = true;
			
		$firstName = isset($_POST['first_name']) ? trim($_POST['first_name']) : NULL;
		$lastName = isset($_POST['last_name']) ? trim($_POST['last_name']) : NULL;
		$email = isset($_POST['email']) ? trim($_POST['email']) : "";
		$message = isset($_POST['message']) ? trim($_POST['message']) : "";
			
		if (empty($email))
		{
			$check = false;
			array_push($errors, "E-mail is required!");
		}
		else if (!filter_var( $email, FILTER_VALIDATE_EMAIL ))
		{
			$check = false;
			array_push($errors, "Invalid E-mail!");
		}
			
		if (empty($message))
		{
			$check = false;
			array_push($errors, "Message is required!");
		}

        if (!$check)
		{
            $this->_setView('index');
            $this->_view->set('title', 'Invalid form data!');
			$this->_view->set('errors', $errors);
			$this->_view->set('formData', $_POST);
			return $this->_view->output();
		}
			
		try {
					
			$contact = new ContactModel();
			$contact->setFirstName($firstName);
			$contact->setLastName($lastName);
			$contact->setEmail($email);
			$contact->setMessage($message);
			$contact->store();
					
			$this->_setView('success');
			$this->_view->set('title', 'Store success!');
					
			$data = array(
				'firstName' => $firstName,
				'lastName' => $lastName,
				'email' => $email,
				'message' => $message
			);
					
			$this->_view->set('userData', $data);
					
		} catch (Exception $e) {
            $this->_setView('index');
            $this->_view->set('title', 'There was an error saving the data!');
            $this->_view->set('formData', $_POST);
			$this->_view->set('saveError', $e->getMessage());
		}

        return $this->_view->output();
    }
    
    public function details($leadId)
	{
		try {
			
			$lead = $this->_model->getLeadById((int)$leadId);
			
			if ($lead)
			{
				$this->_view->set('firstname', $lead['first_name']);
				$this->_view->set('lastname', $lead['last_name']);
				$this->_view->set('message', $lead['message']);
			}
			else 
			{
				$this->_view->set('title', 'Invalid lead ID');
				$this->_view->set('noLead', true);
			}
			
			return $this->_view->output();
			 
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
    public function edit($leadId)
	{
		try {
			
			$lead = $this->_model->getLeadById((int)$leadId);
			
			if ($lead)
			{
				$this->_view->set('firstname', $lead['first_name']);
				$this->_view->set('lastname', $lead['last_name']);
                $this->_view->set('email', $lead['email']);
				$this->_view->set('message', $lead['message']);
			}
			else 
			{
				$this->_view->set('title', 'Invalid lead ID');
				$this->_view->set('noLead', true);
			}
			
			return $this->_view->output();
			 
		} catch (Exception $e) {
			echo '<h1>Application error:</h1>' . $e->getMessage();
		}
	}
}