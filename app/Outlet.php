<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude', 'creator_id', 'details','photo', 'severity', 'urgency'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="'.route('outlets.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get school coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }


      /**
     * Get outlet address attribute.
     *
     * @return string|null
     */
    public function getAddress()
    {
        if ($this->address) {
            return $this->address;
        }
    }

    public function getDetails()
    {
        if ($this->district) {
            return $this->details;
        }
    }


    public function getPhoto()
    {
        if ($this->photo) {
            return $this->photo;
        }
    }

    public function getSeverity()
    {
        if ($this->photo) {
            return $this->severity;
        }
    }

    public function getUrgency()
    {
        if ($this->photo) {
            return $this->urgency;
        }
    }



    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.name').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.address').':</strong><br>'.$this->address.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.details').':</strong><br>'.$this->details.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.photo').':</strong><br>'.$this->photo.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.severity').':</strong><br>'.$this->severity.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.urgency').':</strong><br>'.$this->urgency.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
