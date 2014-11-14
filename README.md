Bates
=====

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/26e940c1-de6f-4d65-a166-5a46241a0558/mini.png)](https://insight.sensiolabs.com/projects/26e940c1-de6f-4d65-a166-5a46241a0558)

A PHP library for interacting with Amazon's Product Advertising API across multiple locales.

### Installation ###

We recommend using [Composer](https://getcomposer.org/doc/00-intro.md#globally) to install Bates. First you'll need to declare the repository so Composer knows where to find it. Add this to your composer.json:

```
"repositories": [
    {
        "type": "git",
        "url": "git@github.com:wpillar/bates.git"
    }
]
```

Then add this:

```
"require": {
    "wpillar/bates": "dev-master",
}
```

### Usage ###

```php
$request = new \Bates\Request(new \Bates\Locale\UK(), new \Bates\ObjectResponse(), 'accessKey', 'secretKey');
$request->setCategory('Books');

$response = $request->search('Harry Potter');

var_dump($response);
```

Henry Walter Bates
------------------
![Bates](http://upload.wikimedia.org/wikipedia/en/thumb/6/6a/HenryWalterBates.JPG/220px-HenryWalterBates.JPG)

Henry Walter Bates was an English naturalist and explorer who gave the first scientific account of mimicry in animals. 
He was most famous for his expedition to the rainforests of the Amazon with Alfred Russel Wallace, starting in 1848. 
Wallace returned in 1852, but lost his collection in a shipwreck. 
When Bates arrived home in 1859 after a full eleven years, he had sent back over 14,712 species (mostly of insects) 
of which 8,000 were new to science.
