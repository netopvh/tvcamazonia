<?php

namespace PrestoPlayer\Pro\Services\ActiveCampaign;

use PrestoPlayer\Pro\Libraries\ActiveCampaignRequest;
use PrestoPlayer\Pro\Support\EmailProvider;

class ActiveCampaign extends EmailProvider {

	protected $key = 'activecampaign';

	/**
	 * Handle active campaign integration
	 *
	 * @param array                       $data
	 * @param \PrestoPlayer\Models\Preset $preset
	 * @return void
	 */
	public function handle( $data, $preset ) {
		// get list and email
		$email = $data['email'];
		$list  = $preset->email_collection['provider_list'];
		$tag   = $preset->email_collection['provider_tag'];

		// get client
		$client = ActiveCampaignRequest::getClient();

		// add/update subscriber and get back id
		$response = $client->post(
			'contact/sync',
			array(
				'body' => array(
					'contact' => array(
						'email' => $email,
					),
				),
			)
		);

		// get contact
		$contact = $response->contact;

		// optionally add subscriber to list
		if ( $list ) {
			$client->post(
				'contactLists',
				array(
					'body' => array(
						'contactList' => array(
							'list'    => $list,
							'contact' => $contact->id,
							'status'  => 1,
						),
					),
				)
			);
		}

		if ( $tag ) {
			$client->post(
				'contactTags',
				array(
					'body' => array(
						'contactTag' => array(
							'contact' => $contact->id,
							'tag'     => $tag,
						),
					),
				)
			);
		}
	}
}
