<?php

/**
 * BaseCommunity
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $file_id
 * @property integer $community_category_id
 * @property File $File
 * @property CommunityCategory $CommunityCategory
 * @property Doctrine_Collection $CommunityMember
 * @property Doctrine_Collection $CommunityMemberPosition
 * @property Doctrine_Collection $CommunityConfig
 * 
 * @method integer             getId()                      Returns the current record's "id" value
 * @method string              getName()                    Returns the current record's "name" value
 * @method integer             getFileId()                  Returns the current record's "file_id" value
 * @method integer             getCommunityCategoryId()     Returns the current record's "community_category_id" value
 * @method File                getFile()                    Returns the current record's "File" value
 * @method CommunityCategory   getCommunityCategory()       Returns the current record's "CommunityCategory" value
 * @method Doctrine_Collection getCommunityMember()         Returns the current record's "CommunityMember" collection
 * @method Doctrine_Collection getCommunityMemberPosition() Returns the current record's "CommunityMemberPosition" collection
 * @method Doctrine_Collection getCommunityConfig()         Returns the current record's "CommunityConfig" collection
 * @method Community           setId()                      Sets the current record's "id" value
 * @method Community           setName()                    Sets the current record's "name" value
 * @method Community           setFileId()                  Sets the current record's "file_id" value
 * @method Community           setCommunityCategoryId()     Sets the current record's "community_category_id" value
 * @method Community           setFile()                    Sets the current record's "File" value
 * @method Community           setCommunityCategory()       Sets the current record's "CommunityCategory" value
 * @method Community           setCommunityMember()         Sets the current record's "CommunityMember" collection
 * @method Community           setCommunityMemberPosition() Sets the current record's "CommunityMemberPosition" collection
 * @method Community           setCommunityConfig()         Sets the current record's "CommunityConfig" collection
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCommunity extends opDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('community');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'comment' => 'Serial number',
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'default' => '',
             'notnull' => true,
             'comment' => 'Community name',
             'length' => 64,
             ));
        $this->hasColumn('file_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'Top image file id',
             'length' => 4,
             ));
        $this->hasColumn('community_category_id', 'integer', 4, array(
             'type' => 'integer',
             'comment' => 'Community category id',
             'length' => 4,
             ));


        $this->index('name_UNIQUE', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
             ));
        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('comment', 'Saves informations of communities');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('File', array(
             'local' => 'file_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasOne('CommunityCategory', array(
             'local' => 'community_category_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasMany('CommunityMember', array(
             'local' => 'id',
             'foreign' => 'community_id'));

        $this->hasMany('CommunityMemberPosition', array(
             'local' => 'id',
             'foreign' => 'community_id'));

        $this->hasMany('CommunityConfig', array(
             'local' => 'id',
             'foreign' => 'community_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}