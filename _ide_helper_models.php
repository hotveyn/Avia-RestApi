<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Airport
 *
 * @property int $id
 * @property string $city
 * @property string $name
 * @property string $iata
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Airport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Airport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Airport query()
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereIata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Airport whereUpdatedAt($value)
 */
	class Airport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Booking
 *
 * @property int $id
 * @property int $flight_from
 * @property int|null $flight_back
 * @property string $date_from
 * @property string|null $date_back
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Flight|null $flightBack
 * @property-read \App\Models\Flight $flightFrom
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Passenger[] $passengers
 * @property-read int|null $passengers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDateBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFlightBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFlightFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 */
	class Booking extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Flight
 *
 * @property int $id
 * @property string $flight_code
 * @property int $from_id
 * @property int $to_id
 * @property string $time_from
 * @property string $time_to
 * @property int $cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Airport $airportFrom
 * @property-read \App\Models\Airport $airportTo
 * @method static \Illuminate\Database\Eloquent\Builder|Flight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereFlightCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereTimeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereTimeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flight whereUpdatedAt($value)
 */
	class Flight extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Passenger
 *
 * @property int $id
 * @property int $booking_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_date
 * @property string $document_number
 * @property string|null $place_from
 * @property string|null $place_back
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Booking $bookings
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger wherePlaceBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger wherePlaceFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Passenger whereUpdatedAt($value)
 */
	class Passenger extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $password
 * @property string $document_number
 * @property string|null $api_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User passenger()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

