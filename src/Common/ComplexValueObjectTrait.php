<?PHP

/**
 *  A common interface for all value objects.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Common;

/**
 * Implements basic constructor for complex value objects.
 */
trait ComplexValueObjectTrait
{
    /** @var array Contains the data for which a property were not found */
    private $otherData = [];

    /**
     * Accepts an array containing the values to set in the object.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        foreach ($values as $property => $value) {
            $setter = 'set' . ucfirst($property);
            $adder = 'add' . ucfirst($property);

            if (true === method_exists($this, $setter)) {
                $this->$setter($value);
                unset($values[$property]);
            }

            if (true === method_exists($this, $adder)) {
                $this->$adder($value);
                unset($values[$property]);
            }
        }

        // Add remaining value to $otherData
        $this->otherData = $values;
    }

    /**
     * Get other data if present, null instead.
     *
     * @return array|null
     */
    public function getOtherData()
    {
        return (true === empty($this->otherData)) ? null : $this->otherData;
    }

    /**
     * Returns the built value object or null if no one is present.
     * @return mixed
     */
    public function getValueObject()
    {
        return $this->valueObject;
    }
}
