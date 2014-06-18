<?php

class ContactModel extends Model
{
	private $_firstName;
	private $_lastName;
	private $_email;
	private $_message;
	
	public function setFirstName($firstName)
	{
		$this->_firstName = $firstName;
	}
	
	public function setLastName($lastName)
	{
		$this->_lastName = $lastName;
	}
	
	public function setEmail($email)
	{
		$this->_email = $email;
	}
	
	public function setMessage($message)
	{
		$this->_message = $message;
	}
	
	public function store()
	{
		$sql = "INSERT INTO contact 
					(first_name, last_name, email, message)
 				VALUES 
 					(?, ?, ?, ?)";
		
		$data = array(
			$this->_firstName,
			$this->_lastName,
			$this->_email,
			$this->_message
		);
		
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}
    public function edit()
	{
		$sql = "UPDATE contact 
                    set first_name=?, last_name=?, email=?, message=?
                WHERE 
                  id = 3";
		
		$data = array(
			$this->_firstName,
			$this->_lastName,
			$this->_email,
			$this->_message
		);
		
		$sth = $this->_db->prepare($sql);
		return $sth->execute($data);
	}
    public function getLeads()
	{
		$sql = "SELECT
					*
				FROM 
					contact";
		
		$this->_setSql($sql);
		$leads = $this->getAll();
		
		if (empty($leads))
		{
			return false;
		}
		return $leads;
	}
	public function getLeadById($id)
	{
		$sql = "SELECT
					a.first_name,
					a.last_name,
                    a.message,
                    a.email
				FROM 
					contact a
				WHERE 
					a.id = ?";
		
		$this->_setSql($sql);
		$leadDetails = $this->getRow(array($id));
		
		if (empty($leadDetails))
		{
			return false;
		}
		return $leadDetails;
	}
}