<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\imagine\Image;

/**
 * This is the model class for table "monster".
 *
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property string $gender
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property integer $skinId
 *
 * @property Skin $skin
 */
class UsersData extends ActiveRecord implements IdentityInterface
{

    public $hashPassword  = false;

    // public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['age','skinId'], 'integer'],
            [['first_name', 'last_name', 'email', 'username', 'password', 'authKey'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 6],
            [['username'], 'unique'],
            [['password'], 'string', 'min' => 6],
            [['gender'], 'in', 'range' => ['Male','Female']]
            // [['imageFile'], 'file','skipOnEmpty'=>true,'extensions'=>'jpg,png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'gender' => 'Gender',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key'
        ];
    }

    // public function upload()
    // {
    //     if ($this->imageFile) {
    //         $path = Url::to('@webroot/images/photos/');
    //         $filename = strtolower($this->name) . '.jpg';
    //         //$this->imageFile->saveAs($path . $filename);

    //         Image::frame($this->imageFile->tempName, 20, '00FF00',100)
    //             ->save($path.$filename,['quality'=>90]);
    //     }
    //     return true;
    // }

    // public function getSkin()
    // {
    //     return $this->hasOne(Skin::className(), ['id' => 'skinId']);
    // }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    // public function getPhotoInfo()
    // {
    //     $path = Url::to('@webroot/images/photos/');
    //     $url = Url::to('@web/images/photos/');
    //     $filename = strtolower($this->name) . '.jpg';
    //     $alt = $this->username . "'s Profile Picture";

    //     $imageInfo = ['alt'=> $alt];

    //     if (file_exists($path . $filename)) {
    //         $imageInfo['url'] = $url.$filename;
    //     } else {
    //         $imageInfo['url'] = $url.'default.jpg';
    //     }

    //     return $imageInfo;
    // }

    // public function getProfileGender()
    // {
    //     return ($this->gender === 'Male') ? 'Bachelor' : 'Bachelorette';
    // }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        // return \Yii::$app->security->validatePassword($password, $this->password);
        return $this->password === $password;
        // return ($password === $this->$password;
    }

    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if ($this->hashPassword) {
    //             $this->password = \Yii::$app->security->generatePasswordHash($this->password, 10);
    //         }
    //         // $this->upload();
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $auth = Yii::$app->authManager;
            if ($this->first_name == "Mondo") {
                $role = $auth->getRole('admin');
            } else {
                $role = $auth->getRole('member');
            }

            $auth->assign($role, $this->id);
        }
        
        parent::afterSave($insert, $changedAttributes);
    }
}
