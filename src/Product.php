<?php
	class Product
	{

		private $gender;
		private $type_id;
		private $name;
		private $description;
		private $price;
        private $img;
		private $id;

	    function __construct($gender, $type_id, $name, $description, $price, $img, $id = NULL)
	    {
			$this->gender = $gender;
			$this->type_id = $type_id;
			$this->name = $name;
			$this->description = $description;
			$this->price = $price;
      		$this->img = $img;
			$this->id = $id;
	    }

	    function getId()
	    {
	     	return $this->id;
	    }

    	function getName()
		{
			return $this->name;
		}

		function setName($name)
		{
			$this->name = $name;
		}

	    function getDescription()
	    {
	     	return $this->description;
	    }

	    function setDescription($description)
	    {
	     	$this->description = $description;
	    }

	    function getTypeId()
	    {
	     	return $this->type_id;
	    }

	    function setTypeId($type_id)
	    {
	     	$this->type_id = $type_id;
	    }

	    function getGender()
	    {
	     	return $this->gender;
	    }

	    function setGender($gender)
	    {
	     	$this->gender = $gender;
	    }

	    function getPrice()
	    {
	     	return $this->price;
	    }

	    function setPrice($price)
	    {
	     	$this->price = $price;
	    }

	    function getImg()
	    {
	     	return $this->img;
	    }

	    function setImg($img)
	    {
	     	$this->img = $img;
	    }

		function save()
		{
			$GLOBALS['DB']->exec(
	 	   	"INSERT INTO products
	 	   	(gender, type_id, name, description, price, img)
	 	   	VALUES
				('{$this->getGender()}',
				{$this->getTypeId()},
				'{$this->getName()}',
				'{$this->getDescription()}',
				'{$this->getPrice()}',
				'{$this->getImg()}'
				)"
			);
	 		$this->id = $GLOBALS['DB']->lastInsertId();
		}

	    static function getAll()
		{
			$returned_products = $GLOBALS['DB']->query("SELECT * FROM products;");
		 	$products = array();
		 	foreach($returned_products as $product) {
		    $gender = $product['gender'];
		    $type_id = $product['type_id'];
		    $name = $product['name'];
		    $description = $product['description'];
		    $price = $product['price'];
		    $img = $product['img'];
		    $id = $product['id'];

			$new_product = new Product($gender, $type_id, $name, $description, $price, $img, $id);

			array_push($products, $new_product);
	 	}
	 	    return $products;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM products;");
		}

		static function find($search_id)
        {
	        $found_product = NULL;
	        $all_products = Product::getAll();

			foreach($all_products as $product) {
		        if ($search_id == $product->getId()){
		        $found_product = $product;
	            }
	        }
            return $found_product;
        }

		static function findByTypeAndGender($search_TypeId, $search_Gender)
        {
        	$found_products = array();
        	$all_products = Product::getAll();

			foreach($all_products as $product) {
    			if ($search_TypeId == $product->getTypeId() &&
				$search_Gender == $product->getGender()){
				array_push($found_products, $product);
                }
            }
			return $found_products;
        }

		static function getTypeName($search_TypeId)
		{
			$query = $GLOBALS['DB']->query("SELECT type from product_types where id={$search_TypeId};");
			$fetch_all = $query->fetchAll(PDO::FETCH_ASSOC);
			$returned_type = $fetch_all[0]["type"];
			return $returned_type;
	    }

		function cartSave()
		{
			array_push($_SESSION['cart'], $this);
		}

		static function cartGetAll()
		{
			return $_SESSION['cart'];
		}

		static function cartDeleteAll()
		{
			$_SESSION['cart'] = array();
		}

		static function calculateCartItemPrice()
		{
			$cart = $_SESSION['cart'];
			$price = 0;
		    foreach ($cart as $item)
		    {
		    	$product_id = $item[0];
		        $qty = $item[1];
				$product = Product::find($product_id);
				$item_price = $product->getPrice();
				$full_item_price = $item_price * $qty;
		    }
		    return $full_item_price;
		}

		static function calculateTotalCartPrice()
		{
			$price = 0;
			$all_item_prices = array();

		    foreach ($_SESSION['cart'] as $item)
		    {
		        $product_id = $item[0];
		        $qty = $item[1];
				$product = Product::find($product_id);
				$item_price = $product->getPrice();
				$full_item_price = $item_price * $qty;
				array_push($all_item_prices, $full_item_price);

			}
			$total_price = array_sum($all_item_prices);
			return $total_price;
		}
	}
?>
