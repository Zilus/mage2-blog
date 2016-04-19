<?php
namespace TCK\Blog\Block;

class PostView extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \TCK\Blog\Model\Post $post
     * @param \TCK\Blog\Model\PostFactory $postFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \TCK\Blog\Model\Post $post,
        \TCK\Blog\Model\PostFactory $postFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_post = $post;
        $this->_postFactory = $postFactory;
    }

    /**
     * @return \TCK\Blog\Model\Post
     */
    public function getPost()
    {
        // Check if posts has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'posts' data to this block, with a collection
        // that has been filtered differently!
        if (!$this->hasData('post')) {
            if ($this->getPostId()) {
                /** @var \TCK\Blog\Model\Post $page */
                $post = $this->_postFactory->create();
            } else {
                $post = $this->_post;
            }
            $this->setData('post', $post);
        }
        return $this->getData('post');
    }

    protected function _prepareLayout()
    {
        $post=$this->getPost();
        parent::_prepareLayout();
        
        $this->getLayout()->createBlock('Magento\Catalog\Block\Breadcrumbs');
                
        $seo_title = __($post->getTitle());
        $description = __($post->getSeoDescription());
        $keywords = __($post->getSeoKeywords());
 
        $this->pageConfig->getTitle()->set($seo_title);
        $this->pageConfig->setDescription($description);
        $this->pageConfig->setKeywords($keywords);

        $pageMainTitle = $this->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle) {
            $pageMainTitle->setPageTitle($seo_title);
        }

        if ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbsBlock->addCrumb(
                'noticias',
                [
                    'label' => "Blog",
                    'title' => "Blog",
                    'link' => "/blog/"
                ]
            );
            $breadcrumbsBlock->addCrumb(
                'noticia',
                [
                    'label' => $seo_title,
                    'title' => $seo_title,
                    'link' => false
                ]
            );
        }        
        
        return $this;
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\TCK\Blog\Model\Post::CACHE_TAG . '_' . $this->getPost()->getId()];
    }

}
