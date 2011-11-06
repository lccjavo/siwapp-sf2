<?php

namespace Siwapp\EstimateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Siwapp\CoreBundle\Entity\AbstractItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\EstimateBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(indexes={
 *    @ORM\index(name="desc_idx", columns={"description"})
 * }, name="EstimateItem")
 */
class Item extends AbstractItem
{
  /**
   * @ORM\ManyToOne(targetEntity="Estimate", inversedBy="items")
   *
   */
  private $estimate;

  /**
   * @ORM\ManyToMany(targetEntity="Siwapp\CoreBundle\Entity\Tax")
   * @ORM\JoinTable(name="EstimateItems_Taxes")
   */
  private $taxes;

  public function __construct()
  {
    $this->taxes = new ArrayCollection();
  }

    /**
     * Set invoice
     *
     * @param Siwapp\EstimateBundle\Entity\Estimate $estimate
     */
    public function setEstimate(\Siwapp\EstimateBundle\Entity\Estimate $estimate)
    {
        $this->estimate = $estimate;
    }

    /**
     * Get invoice
     *
     * @return Siwapp\EstimateBundle\Entity\Estimate
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Add taxes
     *
     * @param Siwapp\CoreBundle\Entity\Tax $taxes
     */
    public function addTax(\Siwapp\CoreBundle\Entity\Tax $taxes)
    {
        $this->taxes[] = $taxes;
    }

    /**
     * Get taxes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTaxes()
    {
        return $this->taxes;
    }
}