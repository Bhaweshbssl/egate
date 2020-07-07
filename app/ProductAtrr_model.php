<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAtrr_model extends Model
{
    protected $table='product_att';
    protected $primaryKey='id';
    protected $fillable=['products_id','sku','size','price','stock','ean','projector_type','light_source','design','brightness','ansi','resolution_native','resolution_support','video_compatibility','aspect_ratio','contrast_ratio','throw_ratio','digital_zoom','keys_tone','voltage','power','cpu','os','dim_effect','power_backup','vga','audio_out','av','hdmi','sd','usb','wireless_display','wifi','bluetooth','speaker','dimension','weight','weight_box','dimension_product','note'];
}
