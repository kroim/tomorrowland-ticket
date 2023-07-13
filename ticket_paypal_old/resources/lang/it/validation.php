<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'L\'attributo: deve essere accettato.',
    'active_url'           => 'L\'attributo: non è un URL valido.',
    'after'                => 'L\'attributo: deve essere una data successiva alla data.',
    'after_or_equal'       => 'L\'attributo: deve essere una data successiva o uguale a: data.',
    'alpha'                => 'L\'attributo: può contenere solo lettere.',
    'alpha_dash'           => 'L\'attributo: può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => 'L\'attributo: può contenere solo lettere e numeri.',
    'array'                => 'L\'attributo: deve essere un array.',
    'before'               => 'L\'attributo: deve essere una data precedente: data.',
    'before_or_equal'      => 'L\'attributo: deve essere una data precedente o uguale a: data.',
    'between'              => [
        'numeric' => 'L\'attributo: deve essere compreso tra: min e: max.',
        'file'    => 'L\'attributo: deve essere compreso tra: min e: max kilobyte.',
        'string'  => 'L\'attributo: deve essere compreso tra: min e: max caratteri.',
        'array'   => 'L\'attributo: deve avere tra: min e: max elementi.',
    ],
    'boolean'              => 'Il campo: attributo deve essere vero o falso.',
    'confirmed'            => 'La conferma dell\'attributo non corrisponde.',
    'date'                 => 'L\'attributo: non è una data valida.',
    'date_format'          => 'L\'attributo: non corrisponde al formato: formato.',
    'different'            => 'L\'attributo: e l\'altro devono essere diversi.',
    'digits'               => 'L\'attributo: deve essere: cifre cifre.',
    'digits_between'       => 'L\'attributo: deve essere compreso tra: min e: cifre massime.',
    'dimensions'           => 'L\'attributo: ha dimensioni dell\'immagine non valide.',
    'distinct'             => 'Il campo: attributo ha un valore duplicato.',
    'email'                => 'L\'attributo: deve essere un indirizzo email valido.',
    'exists'               => 'L\'attributo: attribute non è valido.',
    'file'                 => 'L\'attributo: deve essere un file.',
    'filled'               => 'Il campo: attribute deve avere un valore.',
    'image'                => 'L\'attributo: deve essere un\'immagine.',
    'in'                   => 'L\'attributo: attribute non è valido.',
    'in_array'             => 'Il campo: attributo non esiste in: altro.',
    'integer'              => 'L\'attributo: deve essere un numero intero.',
    'ip'                   => 'L\'attributo: deve essere un indirizzo IP valido.',
    'json'                 => 'L\'attributo: deve essere una stringa JSON valida.',
    'max'                  => [
        'numeric' => 'L\'attributo: non può essere maggiore di: max.',
        'file'    => 'L\'attributo: non può essere maggiore di: max kilobyte.',
        'string'  => 'L\'attributo: non può essere maggiore di: caratteri max.',
        'array'   => 'L\'attributo: non può avere più di: articoli max.',
    ],
    'mimes'                => 'L\'attributo: deve essere un file di tipo:: valori.',
    'mimetypes'            => 'L\'attributo: deve essere un file di tipo:: valori.',
    'min'                  => [
        'numeric' => 'L\'attributo: deve essere almeno: min.',
        'file'    => 'L\'attributo: deve essere almeno: min kilobyte.',
        'string'  => 'L\'attributo: deve essere almeno: min caratteri.',
        'array'   => 'L\'attributo: deve avere almeno: min items.',
    ],
    'not_in'               => 'L\'attributo: attribute non è valido.',
    'numeric'              => 'L\'attributo: deve essere un numero.',
    'present'              => 'Il campo: attributo deve essere presente.',
    'regex'                => 'Il formato: attributo non è valido.',
    'required'             => 'Il campo: è richiesto.',
    'required_if'          => 'Il campo: attribute è obbligatorio quando: other is: value.',
    'required_unless'      => 'Il campo: attribute è obbligatorio a meno che: other is in: values.',
    'required_with'        => 'Il campo: attribute è obbligatorio quando: i valori sono presenti.',
    'required_with_all'    => 'Il campo: attributo è richiesto quando: i valori sono presenti.',
    'required_without'     => 'Il campo: attributo è obbligatorio quando: i valori non sono presenti.',
    'required_without_all' => 'Il campo: attribute è richiesto quando nessuno dei: valori sono presenti.',
    'same'                 => 'The: attributo e: altro deve corrispondere.',
    'size'                 => [
        'numeric' => 'L\'attributo: deve essere: size.',
        'file'    => 'L\'attributo: deve essere: size kilobytes.',
        'string'  => 'L\'attributo: deve essere: size characters.',
        'array'   => 'L\'attributo: deve contenere: size items.',
    ],
    'string'               => 'L\'attributo: deve essere una stringa.',
    'timezone'             => 'L\'attributo: deve essere una zona valida.',
    'unique'               => 'L\'attributo: è già stato acquisito.',
    'uploaded'             => 'The: attribute failed to upload.',
    'url'                  => 'Il formato: attributo non è valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-messaggio',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
