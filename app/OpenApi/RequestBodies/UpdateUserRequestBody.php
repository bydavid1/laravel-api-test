<?php

namespace App\OpenApi\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class UpdateUserRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('UserUpdate')
            ->description('Updates user')
            ->content(
                MediaType::json()->schema(
                    Schema::create()
                    ->properties(
                        Schema::string('name')->example('John Doe')
                            ->description('The name of the user. Maximum 40 characters.'),
                        Schema::string('username')->example('john.doe')
                            ->description('The username of the user. Maximum 40 characters. Must be unique.'),
                        Schema::string('email')->example('john.doe@example.com')
                            ->description('The email of the user. Maximum 40 characters. Must be unique.'),
                        Schema::string('password')->example('newpassword')
                            ->description('The password of the user. Must be between 6 and 30 characters.'),
                        Schema::integer('phone')->example(1234567890)
                            ->description('The phone number of the user. Must be an integer between 6 and 8 digits.'),
                        Schema::string('birthdate')->example('1980-01-01')
                            ->description('The birthdate of the user. Must be in the format YYYY-MM-DD.')
                    )
                )
            );
    }
}

