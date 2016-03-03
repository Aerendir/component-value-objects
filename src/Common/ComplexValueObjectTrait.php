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
    /**
     * Accepts an array containing the values to set in the object.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        foreach ($values as $property => $value) {
            $setter = 'set' . ucfirst($property);
            $adder  = 'add' . ucfirst($property);

            if (true === method_exists($this, $setter)) {
                $this->$setter($value);
            }

            if (true === method_exists($this, $adder)) {
                $this->$adder($value);
            }
        }
    }
}
