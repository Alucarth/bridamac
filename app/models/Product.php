<?php

class Product extends EntityModel
{
	
	/**
     * @var integer
     */
    private $fv_id;

    /**
     * @var DateTime
     */
    private $fv_createdAt;

    /**
     * @var \DateTime
     */
    private $fv_updatedAt;

    /**
     * @var \DateTime
     */
    private $fv_deletedAt;

    /**
     * @var string
     */
    private $fv_productKey;

    /**
     * @var string
     */
    private $fv_notes;

    /**
     * @var string
     */
    private $fv_cost;

    /**
     * @var string
     */
    private $fv_qty;

    /**
     * @var integer
     */
    private $fv_publicId;

    /**
     * @var Accounts
     */
    private $fv_account;

    /**
     * @var Categories
     */
    private $fv_category;

    /**
     * @var Users
     */
    private $fv_user;

    /**
     * @var Tiny int
     */
    private $fv_isProduct;





	public function account()
	{
		return $this->belongsTo('Account');
	}
	
	public function category()
	{
		return $this->belongsTo('Category');
	}

    public function unidad()
    {
        return $this->belongsTo('Unidad');
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Products
     */
    public function setCreatedAt($createdAt)
    {
        if(is_null($createdAt))
		{			
			$this->fv_createdAt = "createdAt ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_createdAt=null;
		$this->created_at=$createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        if(is_null($updatedAt))
		{			
			$this->fv_updatedAt = "updatedAt ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_updatedAt=null;
		$this->updated_at=$updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        if(is_null($deletedAt))
		{			
			$this->fv_deletedAt = "deletedAt ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_deletedAt=null;
		$this->deleted_at=$deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Set productKey
     *
     * @param string $productKey     
     */
    public function setProductKey($productKey)
    {
        if(is_null($productKey))
		{			
			$this->fv_productKey = "productKey ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_productKey=null;
		$this->product_key=$productKey;
        return $this;
    }

    /**
     * Get productKey
     *
     * @return string 
     */
    public function getProductKey()
    {
        return $this->product_key;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Products
     */
    public function setNotes($notes)
    {
       	if(is_null($notes))
		{			
			$this->fv_notes = "notes ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_notes=null;
		$this->notes=$notes;
        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return Products
     */
    public function setCost($cost)
    {
        if(is_null($cost))
		{			
			$this->fv_cost = "cost ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_cost=null;
		$this->cost=$cost;
        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set qty
     *
     * @param string $qty
     * @return Products
     */
    public function setQty($qty)
    {
        if(is_null($qty))
		{			
			$this->fv_qty = "qty ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_qty=null;
		$this->qty=$qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return string 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set publicId
     *
     * @param integer $publicId
     * @return Products
     */
    public function setPublicId($publicId)
    {
        if(is_null($publicId))
		{			
			$this->fv_publicId = "publicId ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_publicId=null;
		$this->public_id=$publicId;

        return $this;
    }

    /**
     * Get publicId
     *
     * @return integer 
     */
    public function getPublicId()
    {
        return $this->public_id;
    }
    /**
     * Set isProduct
     *
     * @param string $isProduct
     * @return int
     */
    public function setIsProduct($isProduct)
    {
        if(is_null($isProduct))
        {           
            $this->fv_isProduct = "Is Product ".ERROR_NULL."<br>";     
            return; 
        }
        $this->fv_isProduct=null;
        $this->is_product=$isProduct;
        return $this;
    }

    /**
     * Get isProduct
     *
     * @return int
     */
    public function getIsPrduct()
    {
        return $this->is_product;
    }

    /**
     * Set account
     *
     * @param Accounts $account
     * @return Products
     */
    public function setAccount($account)
    {
        if(is_null($account))
		{			
			$this->fv_account = "accountid ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_account=null;
		$this->account_id=$account;

        return $this;
    }

    /**
     * Get account
     *
     * @return Accounts 
     */
    public function getAccount()
    {
        return $this->account_id;
    }

    /**
     * Set category
     *
     * @param Categories $category
     * @return Products
     */
    public function setCategory($category)
    {
        
		if(is_null($category))
		{			
			$this->fv_category = "category ".ERROR_NULL."<br>";		
			return;	
		}
		$this->fv_category=null;
		$this->category_id=$category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return Products
     */
  
    public function setUser($user)
    {

        if(is_null($user)) {               

            $this->fv_user = "UserId ".ERROR_NULL."<br>";
            return;
        }
        $this->user_id = $user;
        $this->fv_user = null;
    }

    /**
     * Get user
     *
     * @return Users 
     */
    public function getUser()
    {
        return $this->user_id;
    }






	// public function setAccountId($accountid){

	// 	if(is_null($accountid))
	// 	{			
	// 		$this->fv_account_id = "AccoutId ".ERROR_NULL."<br>";		
	// 		return;	
	// 	}
	// 	$this->fv_account_id=null;
	// 	$this->account_id=$accountid;
	// }


	public function validate(){
		//echo $this->fv_user_id;

		$error_messge = "";
        if($this->created_at){
            $error_messge = $error_messge.$this->fv_createdAt;
        }

        if($this->fv_updatedAt){
            $error_messge = $error_messge.$this->fv_updatedAt;
        }

        if($this->fv_deletedAt){
            $error_messge = $error_messge.$this->fv_deletedAt;
        }

        if($this->fv_productKey){
            $error_messge = $error_messge.$this->fv_productKey;
        }

        if($this->fv_notes){
            $error_messge = $error_messge.$this->fv_notes;
        }

        if($this->fv_cost){
            $error_messge = $error_messge.$this->fv_cost;
        }

        if($this->fv_qty){
            $error_messge = $error_messge.$this->fv_qty;
        }

        if($this->fv_publicId){
            $error_messge = $error_messge.$this->fv_publicId;
        }

        if($this->fv_category){
            $error_messge = $error_messge.$this->fv_category;
        }

		if($this->fv_account){			
			$error_messge=$error_messge.$this->fv_account;
		}

		if($this->fv_user){
			$error_messge=$error_messge.$this->fv_user;
		}
		//echo $error_messge;
		return $error_messge==""?false:$error_messge;
	}

	public function guardar(){
		$error = $this->validate();
		if(!$error)
			return false;
		else
			return $error;
	}



}