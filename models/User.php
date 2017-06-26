<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $nickname
 * @property string $about
 *
 * @property Post[] $tblPosts
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'nickname'], 'required'],
            [['about'], 'string'],
            [['login'], 'string', 'max' => 40],
            [['password', 'email'], 'string', 'max' => 100],
            [['nickname'], 'string', 'max' => 255],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'nickname' => 'Nickname',
            'about' => 'About',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPosts()
    {
        return $this->hasMany(Post::className(), ['author_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
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
        return $this->authKey === $authKey;
    }
}
