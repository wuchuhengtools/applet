<?php
namespace app\api\model;

class Theme extends Base
{

    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];


    /**
     * @info    主题图
     * @description     Theme外键topic_img_id关联Imgae id
     * @return  object
     *
     */
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }


    /**
     * @info    专题列表图
     * @description     Theme外键head_img_id关联Imgae id
     * @return  object
     *
     */
    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }


    /**
     * @info    查询主题数据
     * @params  string      $ids    1,2,3...
     * @return  object      主题主题数据
     *
     */
    public static function getThemeByIds($ids)
    {
        $ids = explode(',',$ids);
        return self::with('topicImg,headImg')->select($ids);
    }


    /**
     * @info    主题关联产品
     *
     */
    public  function products()
    {
         $prefix = config('database.prefix');
         $theme_product = $prefix."theme_product";  //中间表名
        //                           被关联模型 中间多对多表  中间表关id1  中间表关id2 本表id
         return $this->belongsToMany('Product',$theme_product,'product_id','theme_id','id');
    }


    /**
     * @info    获取主题下的产品数据
     * @param   numeral     $id     主题id
     * @return  object              产品数据
     */
    public static function getThemeWithProducts($id)
    {
        $theme = self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }
}

