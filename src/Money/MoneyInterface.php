<?PHP

/**
 *  A Phone value object
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Money;

use SerendipityHQ\Framework\ValueObjects\Common\ValueObjectInterface;

interface MoneyInterface extends ValueObjectInterface
{
    public function getConvertedAmount();
}
