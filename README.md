# Symfony Meta Bundle


## Installation

In bundles.php:

```
return [
    E7\MetaBundle\E7MetaBundle::class => ['all' => true],
];
```

In doctrine.yaml:

```
doctrine:
    dbal:
        types:
            entitystring: E7\MetaBundle\DBAL\Types\EntityString
        mapping_types:
            entitystring: string
```