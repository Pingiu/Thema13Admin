<?php
namespace Perspective\Thema13exercise2\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Perspective\Thema13exercise2\Helper\Data;

class Thema13exercise2 implements ArgumentInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;
    protected $_stockItemRepository;
    protected $helper;

    public function __construct(
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Framework\Registry $registry,
        Data $helper
    )
    {
        $this->_registry = $registry;
        $this->_stockItemRepository = $stockItemRepository;
        $this->helper = $helper;
        
    }
    public function getCurrentProduct()
 {
 return $this->_registry->registry('current_product');
 }
 public function getCurrentCategory()
 {
 return $this->_registry->registry('current_category');
 }
 public function getStockItem($productId)
    {
        return $this->_stockItemRepository->get($productId);
    }

    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }
    public function getParameterX()
    {
        return $this->helper->getParameterX();
    }
}
