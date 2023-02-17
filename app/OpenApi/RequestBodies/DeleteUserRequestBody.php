<?php

namespace App\OpenApi\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class DeleteUserRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('DeleteUser')
            ->description('Deletes user')
            ->content(
                MediaType::json()->schema(
                    Schema::object('Delete user schema')
                    ->properties(
                        Schema::integer('id')->description('ID of the user to be deleted')
                    )
                )
            );

    }
}
