<?php

namespace App\OpenApi\Responses;

use App\OpenApi\Schemas\UserCollectionSchema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;
use Vyuldashev\LaravelOpenApi\Contracts\Reusable;

class ListUsersResponse extends ResponseFactory implements Reusable
{
    public function build(): Response
    {
        return Response::ok()->content(
            MediaType::json()->schema(
                UserCollectionSchema::ref()
            )
        );
    }
}
