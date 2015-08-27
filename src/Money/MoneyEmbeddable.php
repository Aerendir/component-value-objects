<?PHP

/**
 *  A Money Doctrine Embeddable object.
 *
 * This embeddable can be used to persist a money
 * value using Doctrine.
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\MoneyEmbeddable;

use \SerendipityHQ\Component\ValueObjects\Currency\CurrencyInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;

/**
 * @Embeddable
 */
class MoneyEmbeddable
{
    /** @Column(type = "int") */
    private $amount;

    /** @Column(type = "string") */
    private $currency;
}
