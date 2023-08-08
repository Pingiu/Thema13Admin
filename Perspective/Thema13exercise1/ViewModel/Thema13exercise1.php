<?php
namespace Perspective\Thema13exercise1\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Perspective\Thema13exercise1\Helper\Data;

class Thema13exercise1 implements ArgumentInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;
    protected $_stockItemRepository;
    protected $helper;

    /**
     * @var  \Magento\Directory\Model\CurrencyFactory 
     */
    private $currencyFactory;

    public function __construct(
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Framework\Registry $registry,
        Data $helper,
         \Magento\Directory\Model\CurrencyFactory  $currencyFactory
    )
    {
        $this->_registry = $registry;
        $this->_stockItemRepository = $stockItemRepository;
        $this->helper = $helper;
        $this->currencyFactory = $currencyFactory;
        
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
    public function isEnabledUAH()
    {
        return $this->helper->isEnabledUAH();
    }
    public function isEnabledUSD()
    {
        return $this->helper->isEnabledUSD();
    }
    public function isEnabledEURO()
    {
        return $this->helper->isEnabledEURO();
    }

    public function getUAH()
    {
        return $this->helper->getCourseUAH();
    }
    public function getUSD()
    {
        return $this->helper->getCourseUSD();
    }
    public function getEURO()
    {
        return $this->helper->getCourseEURO();
    }


    public function convertPrice($price, $currencyCodeFrom, $currencyCodeTo)
    {
        $rate = $this->currencyFactory->create()
            ->load($currencyCodeFrom)
            ->getAnyRate($currencyCodeTo);

        $convertedPrice = $price * $rate;

        return $convertedPrice;
    }
    
}