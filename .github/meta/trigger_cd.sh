#!/usr/bin/env bash

if [[ -z "$1" ]]; then
    echo "Provide IAC_REPO_SLUG_REF as first argument (eg. xp-gateway)"
    exit 1
fi

if [[ -z "$2" ]]; then
    echo "Provide IAC_RELEASE_VERSION_REF as second argument (eg. 1.0.0)"
    exit 1
fi

IAC_REPO_SLUG_REF=$1
IAC_RELEASE_VERSION_REF=$2

curl -X POST -is -u ${IAC_GIT_USERNAME}:${IAC_GIT_PASSWORD} \
  -H 'Content-Type: application/json' \
 https://api.bitbucket.org/2.0/repositories/${IAC_GIT_NAMESPACE}/${IAC_GIT_REPO_SLUG}/pipelines/ \
  -d '
  {
    "target": {
      "ref_type": "branch",
      "type": "pipeline_ref_target",
      "ref_name": "master"
    },
    "variables": [
    {
      "key": "IAC_REPO_SLUG_REF",
      "value": '"$IAC_REPO_SLUG_REF"',
      "secured": false
    },
    {
      "key": "IAC_RELEASE_VERSION_REF",
      "value": '"$IAC_RELEASE_VERSION_REF"',
      "secured": false
    }
  ]
  }'