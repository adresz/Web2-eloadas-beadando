<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted' => 'A(z) :attribute el kell legyen fogadva.',
    'accepted_if' => 'A(z) :attribute el kell legyen fogadva, ha :other :value.',
    'active_url' => 'A(z) :attribute nem érvényes URL.',
    'after' => 'A(z) :attribute :date utáni dátum kell legyen.',
    'after_or_equal' => 'A(z) :attribute :date vagy későbbi dátum kell legyen.',
    'alpha' => 'A(z) :attribute csak betűket tartalmazhat.',
    'alpha_dash' => 'A(z) :attribute csak betűket, számokat, kötőjeleket és aláhúzásokat tartalmazhat.',
    'alpha_num' => 'A(z) :attribute csak betűket és számokat tartalmazhat.',
    'array' => 'A(z) :attribute tömb kell legyen.',
    'before' => 'A(z) :attribute :date előtti dátum kell legyen.',
    'before_or_equal' => 'A(z) :attribute :date vagy korábbi dátum kell legyen.',
    'between' => [
        'array' => 'A(z) :attribute :min és :max elem között kell legyen.',
        'file' => 'A(z) :attribute :min és :max kilobyte között kell legyen.',
        'numeric' => 'A(z) :attribute :min és :max között kell legyen.',
        'string' => 'A(z) :attribute :min és :max karakter között kell legyen.',
    ],
    'boolean' => 'A(z) :attribute mező csak igaz vagy hamis lehet.',
    'confirmed' => 'A(z) :attribute megerősítése nem egyezik.',
    'current_password' => 'A jelszó helytelen.',
    'date' => 'A(z) :attribute nem érvényes dátum.',
    'date_equals' => 'A(z) :attribute :date dátum kell legyen.',
    'date_format' => 'A(z) :attribute nem felel meg a :format formátumnak.',
    'different' => 'A(z) :attribute és :other különböző kell legyen.',
    'digits' => 'A(z) :attribute :digits számjegy kell legyen.',
    'digits_between' => 'A(z) :attribute :min és :max számjegy között kell legyen.',
    'dimensions' => 'A(z) :attribute képmérete érvénytelen.',
    'distinct' => 'A(z) :attribute mező duplikált értéket tartalmaz.',
    'email' => 'A(z) :attribute érvényes email cím kell legyen.',
    'ends_with' => 'A(z) :attribute a következővel kell végződjön: :values.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'file' => 'A(z) :attribute fájl kell legyen.',
    'filled' => 'A(z) :attribute mező megadása kötelező.',
    'gt' => [
        'array' => 'A(z) :attribute több, mint :value elem kell legyen.',
        'file' => 'A(z) :attribute nagyobb, mint :value kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute nagyobb, mint :value kell legyen.',
        'string' => 'A(z) :attribute hosszabb, mint :value karakter kell legyen.',
    ],
    'gte' => [
        'array' => 'A(z) :attribute legalább :value elem kell legyen.',
        'file' => 'A(z) :attribute legalább :value kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute legalább :value kell legyen.',
        'string' => 'A(z) :attribute legalább :value karakter kell legyen.',
    ],
    'image' => 'A(z) :attribute kép kell legyen.',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute mező nem létezik a :other-ben.',
    'integer' => 'A(z) :attribute egész szám kell legyen.',
    'ip' => 'A(z) :attribute érvényes IP cím kell legyen.',
    'ipv4' => 'A(z) :attribute érvényes IPv4 cím kell legyen.',
    'ipv6' => 'A(z) :attribute érvényes IPv6 cím kell legyen.',
    'json' => 'A(z) :attribute érvényes JSON string kell legyen.',
    'lt' => [
        'array' => 'A(z) :attribute kevesebb, mint :value elem kell legyen.',
        'file' => 'A(z) :attribute kisebb, mint :value kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute kisebb, mint :value kell legyen.',
        'string' => 'A(z) :attribute rövidebb, mint :value karakter kell legyen.',
    ],
    'lte' => [
        'array' => 'A(z) :attribute legfeljebb :value elem kell legyen.',
        'file' => 'A(z) :attribute legfeljebb :value kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute legfeljebb :value kell legyen.',
        'string' => 'A(z) :attribute legfeljebb :value karakter kell legyen.',
    ],
    'max' => [
        'array' => 'A(z) :attribute nem lehet több, mint :max elem.',
        'file' => 'A(z) :attribute nem lehet nagyobb, mint :max kilobyte.',
        'numeric' => 'A(z) :attribute nem lehet nagyobb, mint :max.',
        'string' => 'A(z) :attribute nem lehet hosszabb, mint :max karakter.',
    ],
    'mimes' => 'A(z) :attribute fájlnak a következő típusok egyikének kell lennie: :values.',
    'mimetypes' => 'A(z) :attribute fájlnak a következő típusok egyikének kell lennie: :values.',
    'min' => [
        'array' => 'A(z) :attribute legalább :min elem kell legyen.',
        'file' => 'A(z) :attribute legalább :min kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute legalább :min kell legyen.',
        'string' => 'A(z) :attribute legalább :min karakter kell legyen.',
    ],
    'multiple_of' => 'A(z) :attribute :value többszöröse kell legyen.',
    'not_in' => 'A kiválasztott :attribute érvénytelen.',
    'not_regex' => 'A(z) :attribute formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute szám kell legyen.',
    'password' => 'A jelszó helytelen.',
    'present' => 'A(z) :attribute mező jelen kell legyen.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'required' => 'A(z) :attribute megadása kötelező.',
    'required_if' => 'A(z) :attribute megadása kötelező, ha :other :value.',
    'required_unless' => 'A(z) :attribute megadása kötelező, kivéve, ha :other :values.',
    'required_with' => 'A(z) :attribute megadása kötelező, ha :values jelen van.',
    'required_with_all' => 'A(z) :attribute megadása kötelező, ha :values jelen van.',
    'required_without' => 'A(z) :attribute megadása kötelező, ha :values nincs jelen.',
    'required_without_all' => 'A(z) :attribute megadása kötelező, ha egyik :values sem jelen van.',
    'prohibited' => 'A(z) :attribute mező tiltott.',
    'prohibited_if' => 'A(z) :attribute mező tiltott, ha :other :value.',
    'prohibited_unless' => 'A(z) :attribute mező tiltott, kivéve, ha :other :values.',
    'same' => 'A(z) :attribute és :other meg kell egyezzen.',
    'size' => [
        'array' => 'A(z) :attribute :size elemet kell tartalmazzon.',
        'file' => 'A(z) :attribute :size kilobyte kell legyen.',
        'numeric' => 'A(z) :attribute :size kell legyen.',
        'string' => 'A(z) :attribute :size karakter kell legyen.',
    ],
    'starts_with' => 'A(z) :attribute a következővel kell kezdődjön: :values.',
    'string' => 'A(z) :attribute szöveg kell legyen.',
    'timezone' => 'A(z) :attribute érvényes időzóna kell legyen.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése sikertelen.',
    'url' => 'A(z) :attribute formátuma érvénytelen.',
    'uuid' => 'A(z) :attribute érvényes UUID kell legyen.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'name' => 'név',
        'email' => 'email cím',
        'password' => 'jelszó',
        'password_confirmation' => 'jelszó megerősítése',
    ],

];