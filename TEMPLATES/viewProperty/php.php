<?php

//(1) Page is bookmarkable
//(2) We are able to go back to this page
//(3) If no parameter is specified then we should probably select a property so we go back to the search page

// Listens to this url for requests from the front-end.
$app->get('/viewProperty', function ($request, $response, $args) {
	if(isset($_GET['propertyID'])){
		// Find the property
		// The queries created here are part of the Propel library, explained in the next section
		$property = PropertyQuery::create()->findPk($_GET['propertyID']);
		// The front-end passed some parameters via the url, so now we parse it
		// Find the pictures (for property)
		$pictures = PictureQuery::create()->filterByPropertyid($property->getId())->find();
		// Find the address (for property)
		$address = AddressQuery::create()->findPk($property->getAddressid());
		// Find the continent name (for address)
		$continent = ContinenttypeQuery::create()->findPk($address->getContinenttypeid());
		// Find the country name (for address)
		$country = CountrytypeQuery::create()->findPk($address->getCountrytypeid());
		// Find all the below (for property)
		$appliances = ApplianceQuery::create()->filterByPropertyid($property->getId())->find();
		$utilities = UtilityQuery::create()->filterByPropertyid($property->getId())->find();
		$amenities = AmenityQuery::create()->filterByPropertyid($property->getId())->find();
		$perks = PerkQuery::create()->filterByPropertyid($property->getId())->find();
		$issues = IssueQuery::create()->filterByPropertyid($property->getId())->find();
		$owner = UserQuery::create()->findPk($property->getUserid());
		$phones = PhoneQuery::create()->filterByUserid($owner->getId())->find();

		// Pass all the parameters to the page, will be manipulated by Twig
		// Also sends the viewProperty page to the user in order to render this info 
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