<?php

namespace App\Services;

use App\Services\Newsletter as ServicesNewsletter;
use MailchimpMarketing\ApiClient;

class Newsletter implements ServicesNewsletter{

    public function __construct(protected ApiClient $client)
    {
        
    }




    public function subscribe(string $email, string $list = null){
        $list ??= config('services.mailchimp.lists.subscribers');
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);

        // return $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers') , [
        // return $mailchimp->lists->addListMember($list , [
        return $this->client->lists->addListMember($list , [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
    // protected function client(){
    //     $mailchimp = new ApiClient();

    //     return $mailchimp->setConfig([
    //         'apiKey' => config('services.mailchimp.key'),
    //         'server' => 'us21'
    //     ]);
    // }

    protected function client(){


        return $this->client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
    }
}