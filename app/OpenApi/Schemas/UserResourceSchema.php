<?php

namespace App\OpenApi\Schemas;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use Vyuldashev\LaravelOpenApi\Factories\SchemaFactory;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;

class UserResourceSchema extends SchemaFactory implements Reusable
{
    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    public function build(): SchemaContract
    {
        return Schema::object('UserResource')
        ->properties(
            Schema::string('type')->example('user')->description('Resource type'),
            Schema::integer('id')->example(1)->description('The unique identifier for the user'),
            Schema::object('attributes')
                ->properties(
                    Schema::string('name')->example('John Doe')->description('The name of the user'),
                    Schema::string('username')->example('jdoe')->description('The username of the user'),
                    Schema::string('email')->example('jdoe@example.com')->description('The email address of the user'),
                    Schema::integer('phone')->example(5551234567)->description('The phone number of the user'),
                    Schema::string('birthdate')->example('1990-01-01')->description('The birthdate of the user'),
                )
        );
    }
}
