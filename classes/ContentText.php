<?php
namespace classes;
use config\DataBaseManager;

namespace classes;

class ContentText extends AbstractContent {
    private ?string $content;

    public function setContent(?string $content): self {
        $this->content = $content;
        return $this;
    }

    public function add(): bool {
        $data = [
            "id_course" => $this->id_course,
            "title" => $this->title,
            "type" => "texte",
            "content_text" => $this->content
        ];
        return $this->db->insert("content", $data);
    }

    public function update(): bool {
        $data = [
            "title" => $this->title,
            "content" => $this->content
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
        $result = $this->db->selectBy("content", ["id_course" => $this->id_course]);
        return $result ? $result[0] : null;
    }
}
