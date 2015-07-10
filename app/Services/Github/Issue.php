<?php
/**
 * elearn
 *
 * PHP version 5
 *
 * Copyright (C) Tony Yip 2015.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @category Guardian
 * @author   Tony Yip <tony@opensource.hk>
 * @license  http://opensource.org/licenses/GPL-3.0 GNU General Public License
 */

namespace App\Services\Github;


use App\Exceptions\NotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

class Issue
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $comments = [];

    /**
     * Constructor
     *
     * @param int $id ID of Issue
     */
    public function __construct($owner, $repo, $id)
    {
        $uri = sprintf('https://api.github.com/repos/%s/%s/issues/%d', $owner, $repo, $id);

        $client = new Client();

        $request = new Request('GET', $uri, ['Accept' => "application/vnd.github.v3+json"]);
        try {
            $response = $client->send($request, ['timeout' => 2]);
        } catch (ClientException $e) {
            throw new NotFoundException(sprintf('Fail To Found Issue: %s %s %d', $owner, $repo, $id));
        }

        $body = $response->getBody();
        $data = (array)json_decode($body);

        $this->parseMeta($data);


        $uri .= '/comments';
        $request = new Request('GET', $uri, ['Accept' => "application/vnd.github.v3+json"]);
        $response = $client->send($request, ['timeout' => 2]);

        $body = $response->getBody();
        $data = json_decode($body);

        $this->parseComments($data);

    }

    /**
     * @param $data
     */
    private function parseMeta($data)
    {
        $this->data['url'] = $data['html_url'];
        $this->data['id'] = $data['number'];
        $this->data['title'] = $data['title'];
        $this->data['close'] = $data['closed_at'];
        $this->data['body'] = $data['body'];

        $this->data['user'] = $data['user']->login;

        $this->data['label'] = [];
        foreach ($data['labels'] as $label) {
            $this->data['label'][] = ['name' => $label->name, 'color' => $label->color];
        }
    }

    private function parseComments($data)
    {
        foreach ($data as $comment) {
            $comment = (array)$comment;
            $this->parseComment($comment);
        }
    }

    private function parseComment($data)
    {
        $comment = [];
        $comment['user'] = $data['user']->login;
        $comment['time'] = $data['updated_at'];
        $comment['body'] = $data['body'];

        $this->comments[] = $comment;
    }

    public function getMeta()
    {
        return $this->data;
    }

    public function getComments()
    {
        return $this->comments;
    }

}