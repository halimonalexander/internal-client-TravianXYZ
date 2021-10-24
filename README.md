# Internal api client for TravianXYZ

## Usage

```php
$isGameFinished = (new Client())
    ->worldWonder()
    ->isFinished();
    
$userVillagesPopulation = (new Client())
    ->userVillage()
    ->getPopulationByUser($userId);
```
