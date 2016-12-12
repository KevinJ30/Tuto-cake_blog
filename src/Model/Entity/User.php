<?php
namespace App\Model\Entity;

use App\Auth\LegacyPasswordHasher;
use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $slug
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $publish
 * @property int $category_id
 *
 * @property \App\Model\Entity\Category $category
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    public function _setTitle($title){
        $this->slug = Text::slug($title);
        return $title;
    }

    public function generateToken(){
        return $token = sha1(uniqid() . $this->username . uniqid() . $this->email . uniqid());
    }

    protected function _setPassword($password){
        $hasher = new LegacyPasswordHasher();
        return $hasher->hash($password);
    }

    protected function _setConfirmPassword($password){
        $hasher = new LegacyPasswordHasher();
        return $hasher->hash($password);
    }
}
