<?php

namespace app\models;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use Yii;

/**
 * This is the model class for table "app_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property int $id_level
 * @property int $id_petugas
 * @property int $id_pegawai
 */
class AppUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_level'], 'required'],
            [['id_level', 'id_petugas', 'id_pegawai'], 'integer'],
            [['username', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'id_level' => 'Id Level',
            'id_petugas' => 'Id Petugas',
            'id_pegawai' => 'Id Pegawai',
        ];
    }

     

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    public function getLevel()
    {
        return $this->id_level;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);

    }

     public static function findIdentityByAccessToken($token,$type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

     public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
