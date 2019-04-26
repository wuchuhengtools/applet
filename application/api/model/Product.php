<?php
namespace app\api\model;

use think\Url;

class Product extends Base
{
    protected $hidden = [
        'update_time',
        'delete_time',
        'create_time',
        'img_id',
        'main_img_id',
        'from',
        'category_id',
        'pivot'
    ];


    /**
     *修改图片url为绝对路径
     *
     * @value   url      图片路径
     * @data    objec    单条数据对象
     * @return  url
     */
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    

    /**
     *关联商品详情
     *
     */
    public  function propertise()
    {
        return  $this->hasMany('ProductProperty', 'product_id', 'id');
    }



    /**
     *关联商品详情图
     *
     */
    public  function imgs ()
    {
        return  $this->hasMany('ProductImage', 'product_id', 'id');
    }     

    
    /**
     *获取最新商品
     *
     */
    public static function getMostRecentProduct($count)
    {
        $isProducts =  self::order('create_time desc')->limit($count)->select();
        if ($isProducts) {
             $isProducts = $isProducts->hidden(['summary']);
        }
        return $isProducts;
    }


    /**
     *获取分类商品
     *
     *@categoryID   int     商品id
     *@return       object  分类商品数据
     */
    public static function getProductByCategoryID($categoryID)
    {
        $isProducts = self::where('category_id', '=', $categoryID)->select();
        return $isProducts;
    }
    
    
   /**
     * 获取商品详情
     *
     *  @id     int     商品id 
     *  @return obj     
     */ 
    public function productDetail(int $id)
    {
        return self::with(['imgs'=>function($query){
                $query->with('imgUrl')->order('order asc'); 
            }])
            ->with(['propertise'])
            ->where('id', '=', $id)
            ->find();
    }
}
