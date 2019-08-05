<?php
/**
 * SCallback for the Schema organization type field.
 *
 * @package    Monica_Mixes_Plugin
 * @subpackage Admin\Partials\Field_Callbacks
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace Mixes_Plugin\Admin\Partials\Field_Callbacks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$types = [

	// First option save null.
	null          => __( 'Select one&hellip;', 'mixes-plugin' ),
	'Airline'     => __( 'Airline', 'mixes-plugin' ),
	'Corporation' => __( 'Corporation', 'mixes-plugin' ),

	// Educational Organizations.
	'EducationalOrganization' => __( 'Educational Organization', 'mixes-plugin' ),
		'CollegeOrUniversity' => __( '— College or University', 'mixes-plugin' ),
		'ElementarySchool'    => __( '— Elementary School', 'mixes-plugin' ),
		'HighSchool'          => __( '— High School', 'mixes-plugin' ),
		'MiddleSchool'        => __( '— Middle School', 'mixes-plugin' ),
		'Preschool'           => __( '— Preschool', 'mixes-plugin' ),
		'School'              => __( '— School', 'mixes-plugin' ),

	'GovernmentOrganization'  => __( 'Government Organization', 'mixes-plugin' ),

	// Local Businesses.
	'LocalBusiness' => __( 'Local Business', 'mixes-plugin' ),
		'AnimalShelter' => __( '— Animal Shelter', 'mixes-plugin' ),

		// Automotive Businesses.
		'AutomotiveBusiness' => __( '— Automotive Business', 'mixes-plugin' ),
			'AutoBodyShop'     => __( '—— Auto Body Shop', 'mixes-plugin' ),
			'AutoDealer'       => __( '—— Auto Dealer', 'mixes-plugin' ),
			'AutoPartsStore'   => __( '—— Auto Parts Store', 'mixes-plugin' ),
			'AutoRental'       => __( '—— Auto Rental', 'mixes-plugin' ),
			'AutoRepair'       => __( '—— Auto Repair', 'mixes-plugin' ),
			'AutoWash'         => __( '—— Auto Wash', 'mixes-plugin' ),
			'GasStation'       => __( '—— Gas Station', 'mixes-plugin' ),
			'MotorcycleDealer' => __( '—— Motorcycle Dealer', 'mixes-plugin' ),
			'MotorcycleRepair' => __( '—— Motorcycle Repair', 'mixes-plugin' ),

		'ChildCare'            => __( '— Child Care', 'mixes-plugin' ),
		'Dentist'              => __( '— Dentist', 'mixes-plugin' ),
		'DryCleaningOrLaundry' => __( '— Dry Cleaning or Laundry', 'mixes-plugin' ),

		// Emergency Services.
		'EmergencyService' => __( '— Emergency Service', 'mixes-plugin' ),
			'FireStation'   => __( '—— Fire Station', 'mixes-plugin' ),
			'Hospital'      => __( '—— Hospital', 'mixes-plugin' ),
			'PoliceStation' => __( '—— Police Station', 'mixes-plugin' ),

		'EmploymentAgency' => __( '— Employment Agency', 'mixes-plugin' ),

		// Entertainment Businesses.
		'EntertainmentBusiness' => __( '— Entertainment Business', 'mixes-plugin' ),
			'AdultEntertainment' => __( '—— Adult Entertainment', 'mixes-plugin' ),
			'AmusementPark'      => __( '—— Amusement Park', 'mixes-plugin' ),
			'ArtGallery'         => __( '—— Art Gallery', 'mixes-plugin' ),
			'Casino'             => __( '—— Casino', 'mixes-plugin' ),
			'ComedyClub'         => __( '—— Comedy Club', 'mixes-plugin' ),
			'MovieTheater'       => __( '—— Movie Theater', 'mixes-plugin' ),
			'NightClub'          => __( '—— Night Club', 'mixes-plugin' ),

		// Financial Services.
		'FinancialService' => __( '— Financial Service', 'mixes-plugin' ),
			'AccountingService' => __( '—— Accounting Service', 'mixes-plugin' ),
			'AutomatedTeller'   => __( '—— Automated Teller', 'mixes-plugin' ),
			'BankOrCreditUnion' => __( '—— Bank or Credit Union', 'mixes-plugin' ),
			'InsuranceAgency'   => __( '—— Insurance Agency', 'mixes-plugin' ),

		// Food Establishments.
		'FoodEstablishment' => __( '— Food Establishment', 'mixes-plugin' ),
			'Bakery'             => __( '—— Bakery', 'mixes-plugin' ),
			'BarOrPub'           => __( '—— Bar or Pub', 'mixes-plugin' ),
			'Brewery'            => __( '—— Brewery', 'mixes-plugin' ),
			'CafeOrCoffeeShop'   => __( '—— Cafe or Coffee Shop', 'mixes-plugin' ),
			'FastFoodRestaurant' => __( '—— Fast Food Restaurant', 'mixes-plugin' ),
			'IceCreamShop'       => __( '—— Ice Cream Shop', 'mixes-plugin' ),
			'Restaurant'         => __( '—— Restaurant', 'mixes-plugin' ),
			'Winery'             => __( '—— Winery', 'mixes-plugin' ),

		// Government Offices.
		'GovernmentOffice' => __( '— Government Office', 'mixes-plugin' ),
			'PostOffice' => __( '—— Post Office', 'mixes-plugin' ),

		// Health and Beauty Businesses.
		'HealthAndBeautyBusiness' => __( '— Health and Beauty Business', 'mixes-plugin' ),
			'BeautySalon'  => __( '—— Beauty Salon', 'mixes-plugin' ),
			'DaySpa'       => __( '—— Day Spa', 'mixes-plugin' ),
			'HairSalon'    => __( '—— Hair Salon', 'mixes-plugin' ),
			'HealthClub'   => __( '—— Health Club', 'mixes-plugin' ),
			'NailSalon'    => __( '—— Nail Salon', 'mixes-plugin' ),
			'TattooParlor' => __( '—— Tattoo Parlor', 'mixes-plugin' ),

		// Home and Construction Businesses.
		'HomeAndConstructionBusiness' => __( '— Home and Construction Business', 'mixes-plugin' ),
			'Electrician'       => __( '—— Electrician', 'mixes-plugin' ),
			'GeneralContractor' => __( '—— General Contractor', 'mixes-plugin' ),
			'HVACBusiness'      => __( '—— HVAC Business', 'mixes-plugin' ),
			'HousePainter'      => __( '—— House Painter', 'mixes-plugin' ),
			'Locksmith'         => __( '—— Locksmith', 'mixes-plugin' ),
			'MovingCompany'     => __( '—— MovingCompany', 'mixes-plugin' ),
			'Plumber'           => __( '—— Plumber', 'mixes-plugin' ),
			'RoofingContractor' => __( '—— Roofing Contractor', 'mixes-plugin' ),

		'InternetCafe' => __( '— Internet Cafe', 'mixes-plugin' ),

		// Legal Services.
		'LegalService' => __( '— Legal Service', 'mixes-plugin' ),
			'Attorney' => __( '—— Attorney', 'mixes-plugin' ),
			'Notary'   => __( '—— Notary', 'mixes-plugin' ),

		'Library' => __( '— Library', 'mixes-plugin' ),

		// Lodging Businesses.
		'LodgingBusiness' => __( '— Lodging Business', 'mixes-plugin' ),
			'BedAndBreakfast' => __( '—— Bed and Breakfast', 'mixes-plugin' ),
			'Campground'      => __( '—— Campground', 'mixes-plugin' ),
			'Hostel'          => __( '—— Hostel', 'mixes-plugin' ),
			'Hotel'           => __( '—— Hotel', 'mixes-plugin' ),
			'Motel'           => __( '—— Motel', 'mixes-plugin' ),
			'Resort'          => __( '—— Resort', 'mixes-plugin' ),

		'ProfessionalService' => __( '— Professional Service', 'mixes-plugin' ),
		'RadioStation'        => __( '— Radio Station', 'mixes-plugin' ),
		'RealEstateAgent'     => __( '— Real Estate Agent', 'mixes-plugin' ),
		'RecyclingCenter'     => __( '— Recycling Center', 'mixes-plugin' ),
		'SelfStorage'         => __( '— Self Storage', 'mixes-plugin' ),
		'ShoppingCenter'      => __( '— Shopping Center', 'mixes-plugin' ),

		// Sports Activity Locations.
		'SportsActivityLocation' => __( '— Sports Activity Location', 'mixes-plugin' ),
			'BowlingAlley'       => __( '—— Bowling Alley', 'mixes-plugin' ),
			'ExerciseGym'        => __( '—— Exercise Gym', 'mixes-plugin' ),
			'GolfCourse'         => __( '—— Golf Course', 'mixes-plugin' ),
			'HealthClub'         => __( '—— Health Club', 'mixes-plugin' ),
			'PublicSwimmingPool' => __( '—— Public Swimming Pool', 'mixes-plugin' ),
			'SkiResort'          => __( '—— Ski Resort', 'mixes-plugin' ),
			'SportsClub'         => __( '—— Sports Club', 'mixes-plugin' ),
			'StadiumOrArena'     => __( '—— Stadium or Arena', 'mixes-plugin' ),
			'TennisComplex'      => __( '—— Tennis Complex', 'mixes-plugin' ),

		// Store types.
		'Store' => __( '— Store', 'mixes-plugin' ),
			'AutoPartsStore'      => __( '—— Auto Parts Store', 'mixes-plugin' ),
			'BikeStore'           => __( '—— Bike Store', 'mixes-plugin' ),
			'BookStore'           => __( '—— Book Store', 'mixes-plugin' ),
			'ClothingStore'       => __( '—— Clothing Store', 'mixes-plugin' ),
			'ComputerStore'       => __( '—— Computer Store', 'mixes-plugin' ),
			'ConvenienceStore'    => __( '—— Convenience Store', 'mixes-plugin' ),
			'DepartmentStore'     => __( '—— Department Store', 'mixes-plugin' ),
			'ElectronicsStore'    => __( '—— Electronics Store', 'mixes-plugin' ),
			'Florist'             => __( '—— Florist', 'mixes-plugin' ),
			'FurnitureStore'      => __( '—— Furniture Store', 'mixes-plugin' ),
			'GardenStore'         => __( '—— Garden Store', 'mixes-plugin' ),
			'GroceryStore'        => __( '—— Grocery Store', 'mixes-plugin' ),
			'HardwareStore'       => __( '—— Hardware Store', 'mixes-plugin' ),
			'HobbyShop'           => __( '—— Hobby Shop', 'mixes-plugin' ),
			'HomeGoodsStore'      => __( '—— Home Goods Store', 'mixes-plugin' ),
			'JewelryStore'        => __( '—— Jewelry Store', 'mixes-plugin' ),
			'LiquorStore'         => __( '—— Liquor Store', 'mixes-plugin' ),
			'MensClothingStore'   => __( '—— Mens Clothing Store', 'mixes-plugin' ),
			'MobilePhoneStore'    => __( '—— Mobile Phone Store', 'mixes-plugin' ),
			'MovieRentalStore'    => __( '—— Movie Rental Store', 'mixes-plugin' ),
			'MusicStore'          => __( '—— Music Store', 'mixes-plugin' ),
			'OfficeEquipmentStore'=> __( '—— Office Equipment Store', 'mixes-plugin' ),
			'OutletStore'         => __( '—— Outlet Store', 'mixes-plugin' ),
			'PawnShop'            => __( '—— Pawn Shop', 'mixes-plugin' ),
			'PetStore'            => __( '—— Pet Store', 'mixes-plugin' ),
			'ShoeStore'           => __( '—— Shoe Store', 'mixes-plugin' ),
			'SportingGoodsStore'  => __( '—— Sporting Goods Store', 'mixes-plugin' ),
			'TireShop'            => __( '—— Tire Shop', 'mixes-plugin' ),
			'ToyStore'            => __( '—— Toy Store', 'mixes-plugin' ),
			'WholesaleStore'      => __( '—— Wholesale Store', 'mixes-plugin' ),

		'TelevisionStation'        => __( '— Television Station', 'mixes-plugin' ),
		'TouristInformationCenter' => __( '— Tourist Information Center', 'mixes-plugin' ),
		'TravelAgency'             => __( '— Travel Agency', 'mixes-plugin' ),

	'MedicalOrganization' => __( 'Medical Organization', 'mixes-plugin' ),
	'NGO'                 => __( 'NGO (Non-Governmental Organization', 'mixes-plugin' ),
	'PerformingGroup'     => __( 'Performing Group', 'mixes-plugin' ),
	'SportsOrganization'  => __( 'Sports Organization', 'mixes-plugin' )
];

$options = get_option( 'schema_org_type' );

$html = '<p><select id="schema_org_type" name="schema_org_type">';

foreach( $types as $type => $value ) {

	$selected = ( $options == $type ) ? 'selected="' . esc_attr( 'selected' ) . '"' : '';

	$html .= '<option value="' . esc_attr( $type ) . '" ' . $selected . '>' . esc_html( $value ) . '</option>';

}

$html .= '</select>';
$html .= sprintf(
	'<label for="schema_org_type"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
	$args[0],
	esc_attr( esc_url( 'https://schema.org/docs/full.html#C.Organization' ) ),
	esc_attr( __( 'Read documentation for organization types', 'mixes-plugin' ) )
);
$html .= '</p>';

echo $html;