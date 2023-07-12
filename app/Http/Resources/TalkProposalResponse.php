<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TalkProposalResponse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'abstract' => $this->abstract,
            'preferred_time_slot' => $this->preferred_time_slot,
            'speaker' => new SpeakerResource($this->speaker),
        ];
    }
}
