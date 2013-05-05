<?php

/**
 * BaseNavigation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $caption
 * @property string $type
 * @property string $uri
 * @property integer $sort_order
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method string     getCaption()    Returns the current record's "caption" value
 * @method string     getType()       Returns the current record's "type" value
 * @method string     getUri()        Returns the current record's "uri" value
 * @method integer    getSortOrder()  Returns the current record's "sort_order" value
 * @method Navigation setId()         Sets the current record's "id" value
 * @method Navigation setCaption()    Sets the current record's "caption" value
 * @method Navigation setType()       Sets the current record's "type" value
 * @method Navigation setUri()        Sets the current record's "uri" value
 * @method Navigation setSortOrder()  Sets the current record's "sort_order" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNavigation extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('navigation');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'Serial number',
             'length' => 4,
             ));
        $this->hasColumn('caption', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Description',
             ));
        $this->hasColumn('type', 'string', 64, array(
             'type' => 'string',
             'default' => '',
             'notnull' => true,
             'comment' => 'Navigation type',
             'length' => 64,
             ));
        $this->hasColumn('uri', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'Linked page\'\'s URI',
             ));
        $this->hasColumn('sort_order', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'Order to sort',
             'length' => 4,
             ));


        $this->index('type_sort_order_INDEX', array(
             'fields' => 
             array(
              0 => 'type',
              1 => 'sort_order',
             ),
             ));
        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('comment', 'Saves informations of navigation items');
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'caption',
             ),
             'length' => 5,
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($i18n0);
        $this->actAs($timestampable0);
    }
}