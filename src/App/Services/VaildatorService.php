<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Vaildator;
use Framework\Rules\{
    RequiredRule,
    EmailRule,
    MinRule,
    InRule,
    UrlRule,
    MatchRule
};

class VaildatorService
{

    private Vaildator $vaildator;

    public function __construct()
    {
        $this->vaildator = new Vaildator();

        $this->vaildator->add('required', new RequiredRule());
        $this->vaildator->add('email', new EmailRule());
        $this->vaildator->add('min', new MinRule());
        $this->vaildator->add('in', new InRule());
        $this->vaildator->add('url', new UrlRule());
        $this->vaildator->add('match', new MatchRule());
    }

    public function vaildateRegister(array $formData)
    {
        $this->vaildator->vaildate($formData, [
            'email' => ['required', 'email'],
            'age'   =>  ['required', 'min:18'],
            'country'   =>  ['required', 'in:USA,Canada,Mexico'],
            'socialMediaURL'   =>  ['required', 'url'],
            'password'   =>  ['required'],
            'confirmPassword'   =>  ['required', 'match:password'],
            'tos'   =>  ['required']
        ]);
    }
}
