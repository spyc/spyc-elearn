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


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psy\Util\Json;

class IssueTracker
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var string
     */
    private $repo;


    /**
     * Constructor
     *
     * @param string $owner Repo Owner
     * @param string $repo Repo
     */
    public function __construct($owner, $repo)
    {

        $this->owner = $owner;
        $this->repo = $repo;

        $uri = sprintf('https://api.github.com/repos/%s/%s', $owner, $repo);

        $this->client = new Client([
            'base_uri' => $uri,
            'timeout' => 2.0
        ]);
    }

    public function all()
    {
        $uri = $this->client->getConfig('base_uri');
        $uri .= '/issues';
        $request = new Request('GET', $uri, ['Accept' => "application/vnd.github.v3+json"]);
        $response = $this->client->send($request);

        $body = $response->getBody();
        $gh_issues = json_decode($body);
        $issues = [];

        foreach ($gh_issues as $issue) {
            $issues[] = $issue->number;
        }

        return $issues;
    }

    public function getIssue($id)
    {

    }

}