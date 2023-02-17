<?php

namespace App\OpenApi\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class StoreUserRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('UserCreate')
            ->description('User data')
            ->content(
                MediaType::json()->schema(
                    Schema::object('UserCreate')
                    ->properties(
                        Schema::string('name')->required()->maxLength(40),
                        Schema::string('username')->required()->maxLength(40),
                        Schema::string('email')->required()->maxLength(40),
                        Schema::string('password')->required()->minLength(6)->maxLength(30),
                        Schema::integer('phone')->required()->minimum(100000)->maximum(99999999),
                        Schema::string('birthdate')->required()->format(Schema::FORMAT_DATE),
                    )
                )
            );
        }
}
