<?php

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) If no parameter is specified then we should probably select a property so we go back to the search page
$app->get('/viewProperty', function ($request, $response, $args) {
	if(isset($_GET['propertyID'])){
		//find the property
		$property = PropertyQuery::create()->findPk($_GET['propertyID']); 
		//find the pictures (for property)
		$pictures = PictureQuery::create()->filterByPropertyid($property->getId())->find();
		//find the address (for property)
		$address = AddressQuery::create()->findPk($property->getAddressid());
		//find the continent name (for address)
		$continent = ContinenttypeQuery::create()->findPk($address->getContinenttypeid());
		//find the country name (for address)
		$country = CountrytypeQuery::create()->findPk($address->getCountrytypeid());
		//find all the below (for property)
		$appliances = ApplianceQuery::create()->filterByPropertyid($property->getId())->find();
		$utilities = UtilityQuery::create()->filterByPropertyid($property->getId())->find();
		$amenities = AmenityQuery::create()->filterByPropertyid($property->getId())->find();
		$perks = PerkQuery::create()->filterByPropertyid($property->getId())->find();
		$issues = IssueQuery::create()->filterByPropertyid($property->getId())->find();
		$owner = UserQuery::create()->findPk($property->getUserid());
		$phones = PhoneQuery::create()->filterByUserid($owner->getId())->find();

		//pass all the parameters to the page
		$this->view->render($response, "/viewProperty/html.html", 
			['user'=>current_user(), 
			'property'=>$property,
			'pictures'=>$pictures,
			'address'=>$address,
			'continent'=>$continent,
			'country'=>$country,
			'appliances'=>$appliances,
			'utilities'=>$utilities,
			'amenities'=>$amenities,
			'perks'=>$perks,
			'issues'=>$issues,
			'owner'=>$owner,
			'phones'=>$phones]);
		return $response;
	}
	else{
		Header("Location: ./"); //TODO... this redirect should be a Replace
		exit();
	}
});

?>