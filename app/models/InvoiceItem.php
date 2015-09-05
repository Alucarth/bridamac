<?php
class InvoiceItem extends EntityModel
{
	/**
     * @var integer
     */
    private $fv_id;

    /**
     * @var integer
     */
    private $fv_accountId;

    /**
     * @var \DateTime
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
     * @var float
     */
    private $fv_discount;

    /**
     * @var integer
     */
    private $fv_publicId;

    /**
     * @var Invoices
     */
    private $fv_invoice;

    /**
     * @var Products
     */
    private $fv_product;

    /**
     * @var Users
     */
    private $fv_user;

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
     * Set accountId
     *
     * @param integer $accountId
     * @return InvoiceItems
     */
    public function setAccountId($accountId)
    {
		if(is_null($accountId))
		{			
			$this->fv_accountId = "accountId ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_accountId=null;
		$this->account_id=$accountId;
	    return $this;
    }

    /**
     * Get accountId
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * @return InvoiceItems
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
     * Set discount
     *
     * @param float $discount
     * @return InvoiceItems
     */
    public function setDiscount($discount)
    {
        if(is_null($discount))
		{			
			$this->fv_discount = "discount ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_discount=null;
		$this->discount=$discount;
	    return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set publicId
     *
     * @param integer $publicId
     * @return InvoiceItems
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
     * Set invoice
     *
     * @param Invoices $invoice
     * @return InvoiceItems
     */
    public function setInvoice($invoice)
    {
        if(is_null($invoice))
		{			
			$this->fv_invoice = "invoice ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_invoice=null;
		$this->invoice_id=$invoice;
	    return $this;
    }

    /**
     * Get invoice
     *
     * @return Invoices 
     */
    public function getInvoice()
    {
        return $this->invoice_id;
    }

    /**
     * Set product
     *
     * @param Products $product
     * @return InvoiceItems
     */
    public function setProduct($product)
    {
        if(is_null($product))
		{			
			$this->fv_product = "product ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_product=null;
		$this->product_id=$product;
	    return $this;
    }

    /**
     * Get product
     *
     * @return Products 
     */
    public function getProduct()
    {
        return $this->product_id;
    }

    /**
     * Set user
     *
     * @param Users $user
     * @return InvoiceItems
     */
    public function setUser($user)
    {
        if(is_null($user))
		{			
			$this->fv_user = "user ".ERROR_NULL."<br>";
			return;	
		}
		$this->fv_user=null;
		$this->user_id=$user;
	    return $this;
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
}
?>