<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'url_image', 'title', 'description', 'code', 'price', 'status', 'categorie_id', 'reference', 'size'
    ];
    public function scopePublished($query) {
        return $query->where('status', 'Publié');
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function scopeCategories($query, $id){
        return $query->where('categorie_id', $id);
    }
    public function size(){
        return $this->belongsToMany(Size::class);
    }
    public function scopeSales($query){
        return $query->where('soldes', 'Solde');
    }
    public function picture(){
        return $this->hasOne(Picture::class);
    }
}
