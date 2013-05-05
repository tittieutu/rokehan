<?php

/**
 * BaseOAuthMemberToken
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $member_id
 * @property OAuthConsumerInformation $Consumer
 * @property Member $Member
 * 
 * @method integer                  getMemberId()  Returns the current record's "member_id" value
 * @method OAuthConsumerInformation getConsumer()  Returns the current record's "Consumer" value
 * @method Member                   getMember()    Returns the current record's "Member" value
 * @method OAuthMemberToken         setMemberId()  Sets the current record's "member_id" value
 * @method OAuthMemberToken         setConsumer()  Sets the current record's "Consumer" value
 * @method OAuthMemberToken         setMember()    Sets the current record's "Member" value
 * 
 * @package    OpenPNE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOAuthMemberToken extends OAuthAbstractToken
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('o_auth_member_token');
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => false,
             'comment' => 'Member id',
             'length' => 4,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('comment', 'Saves memebr tokens of OAuth');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OAuthConsumerInformation as Consumer', array(
             'local' => 'oauth_consumer_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}