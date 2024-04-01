<?php

declare(strict_types=1);

namespace Noilty\Http\Client;

class Response
{
    public function __construct
    (
        private int     $code,
        private ?string $contentType,
        private string  $headersPart,
        private string  $bodyPart
    )
    {
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getHeadersPart(): string
    {
        return $this->headersPart;
    }

    public function getBodyPart(): string
    {
        return $this->bodyPart;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @throws \JsonException
     */
    public function getParsedBody(): mixed
    {
        if ($this->is_json($body = $this->getBodyPart())) {
            return json_decode($body);
        }

        throw new \JsonException('String is not a json format.');
    }

    private function is_json(string $value): bool
    {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
