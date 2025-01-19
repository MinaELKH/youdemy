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

    public function getByIdCourse(): ?object {
        $result = $this->db->selectBy("content", ["id_course" => $this->id_course  , "type"=>"video"]);
        return $result ? $result[0] : null;
    }
    static public function getAllByIdCourse($db ,$id_course ): ?array
    {
       $result = $db->selectBy("content", ["id_course" => $id_course , "type"=>"video"]);
       return $result;
   }
   public function display(): string {
   
    
    return '<div class="course-video">
                <h2 class="text-2xl font-bold mb-4">' . htmlspecialchars($this->title) . '</h2>
                <div class="video-container mb-4">
                    <video 
                        class="w-full rounded-lg" 
                        controls
                        poster="' . htmlspecialchars($courseInfo['thumbnail'] ?? '') . '"
                    >
                        <source src="' . htmlspecialchars($this->video_url) . '" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                </div>
                <div class="video-info mb-4">
                    <span class="text-sm text-gray-600">Durée: ' . htmlspecialchars($this->duration) . '</span>
                </div>
            </div>';
}
}

