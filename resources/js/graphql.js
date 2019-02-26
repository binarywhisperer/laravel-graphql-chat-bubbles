import gql from "graphql-tag";

export const CHANNEL_QUERY = gql`
    query {
        channels {
            id
            name
            purpose
        }
    }
`;

export const USERS_QUERY = gql`
    query {
        users {
            id
            name
            display
            color
            color_two
        }
    }
`;

export const SEND_MESSAGE_MUTATION = gql`
    mutation ($payload: String!, test: Int! {
        sendMessage(payload: $payload, test: $channel_id){
            id, 
            payload
        }
    }
 `;

`mutation SubmitRepository($repoFullName: String!) {
    submitRepository(repoFullName: $repoFullName) {
        createdAt
    }
}`
