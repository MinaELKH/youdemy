<?php
namespace classes;
use config\DataBaseManager;

namespace classes;

class ContentVideo extends AbstractContent {
    private ?string $url;
    private ?int $duration ;

    public function setUrl(?string $url): self {
        $this->url = $url;
        return $this;
    }

    public function setDuration( int $duration): self {
        $this->duration = $duration;
        return $this;
    }

    public function add(): bool {
        $data = [
            "id_course" => $this->id_course,
            "title" => $this->title,
            "type" => "video",
            "url_video" => $this->url,
            "duration" => $this->duration
        ];
        return $this->db->insert("content", $data);
    }

    public function update(): bool {
        $data = [
            "title" => $this->title,
            "url_video" => $this->url
        ];
        return $this->db->update("content", $data, "id_content", $this->id_content);
    }

    public function delete(): bool {
        return $this->db->delete("content", "id_content", $this->id_content);
    }

    public function getById(): ?object {
        $result = $this->db->selectBy("content", ["id_content" => $this->id_content]);
        return $result ? $result[0] : null;
    }
}
